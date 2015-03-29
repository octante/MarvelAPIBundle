<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lib;


use Octante\MarvelAPIBundle\Lib\Authentication;

class AuthenticationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: getHashIsCalled
     * with: publicKeyPrivateKeyAndTimestamp
     * should: returnHash
     */
    function test_getHashIsCalled_publicKeyPrivateKeyAndTimestamp_returnHash()
    {
        $sut = new Authentication('private_key', 'public_key', 'timestamp');
        $authenticationParams = $sut->getAuthenticationUrlParams();
        $expected = '&ts=timestamp&apikey=public_key&hash=' . md5('timestamp'.'private_key'.'public_key');
        $this->assertEquals($expected, $authenticationParams);
    }
}
 