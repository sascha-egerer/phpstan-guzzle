<?php

declare(strict_types = 1);

namespace Tests\PHPStan\Reflection\Guzzle;

use GuzzleHttp\Promise\PromiseInterface;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\Guzzle\ClientMethodReflection;
use PHPStan\Reflection\Guzzle\ClientMethodsClassReflectionExtension;
use PHPStan\Reflection\Php\DummyParameter;
use PHPStan\Type\ObjectType;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class ClientMethodExtensionTest extends TestCase
{

	public function testMethodExtension()
	{
		$classReflection = $this->createMock(ClassReflection::class);
		$methodReflection = new ClientMethodReflection($classReflection, 'foo');

		$this->assertSame($classReflection, $methodReflection->getDeclaringClass());
		$this->assertFalse($methodReflection->isStatic());
		$this->assertFalse($methodReflection->isPrivate());
		$this->assertTrue($methodReflection->isPublic());
		$this->assertSame($methodReflection, $methodReflection->getPrototype());
		$this->assertSame('foo', $methodReflection->getName());
		$this->assertFalse($methodReflection->isVariadic());
	}

	/**
	 * @dataProvider getReturnTypeProvider
	 *
	 * @param string $className
	 * @param string $methodName
	 */
	public function testGetReturnType(string $className, string $methodName)
	{
		$classReflection = $this->createMock(ClassReflection::class);
		$methodReflection = new ClientMethodReflection($classReflection, $methodName);
		$type = $methodReflection->getReturnType();

		$this->assertInstanceOf(ObjectType::class, $type);
		$this->assertSame($className, $type->describe());
	}

	public function getReturnTypeProvider(): array
	{
		$values = [];
		foreach (ClientMethodsClassReflectionExtension::METHODS_SYNC as $method) {
			$values[] = [ResponseInterface::class, $method];
		}
		foreach (ClientMethodsClassReflectionExtension::METHODS_ASYNC as $method) {
			$values[] = [PromiseInterface::class, $method];
		}

		return $values;
	}

	public function testGetParameters()
	{
		$classReflection = $this->createMock(ClassReflection::class);
		$methodReflection = new ClientMethodReflection($classReflection, 'foo');
		$parameters = $methodReflection->getParameters();

		$this->assertSame(2, count($parameters));

		/** @var DummyParameter $parameter */
		$parameter = $parameters[0];
		$this->assertInstanceOf(DummyParameter::class, $parameter);
		$this->assertFalse($parameter->isOptional());
		$this->assertSame('Psr\Http\Message\UriInterface|string', $parameter->getType()->describe());

		$parameter = $parameters[1];
		$this->assertInstanceOf(DummyParameter::class, $parameter);
		$this->assertTrue($parameter->isOptional());
		$this->assertSame('mixed', $parameter->getType()->describe());
	}

}
