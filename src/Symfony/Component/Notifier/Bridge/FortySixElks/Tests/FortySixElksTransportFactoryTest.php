<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 */

namespace Symfony\Component\Notifier\Bridge\FortySixElks\Tests;

use Symfony\Component\Notifier\Bridge\FortySixElks\FortySixElksTransportFactory;
use Symfony\Component\Notifier\Test\TransportFactoryTestCase;

class FortySixElksTransportFactoryTest extends TransportFactoryTestCase
{
    public function createFactory(): FortySixElksTransportFactory
    {
        return new FortySixElksTransportFactory();
    }

    public function createProvider(): iterable
    {
        yield [
            'forty-six-elks://host.test?from=Symfony',
            'forty-six-elks://api_username:api_password@host.test?from=Symfony',
        ];
    }

    public function supportsProvider(): iterable
    {
        yield [true, 'forty-six-elks://api_key@default'];
        yield [false, 'somethingElse://api_key@default'];
    }

    public function unsupportedSchemeProvider(): iterable
    {
        yield ['somethingElse://api_key@default'];
    }
}
