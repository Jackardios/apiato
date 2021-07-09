<?php

namespace App\Containers\AppSection\Authentication\UI\API\Tests\Functional;

use App\Containers\AppSection\Authentication\Tests\ApiTestCase;

/**
 * Class ApiLogoutTest
 *
 * @group authentication
 * @group api
 */
class ApiLogoutTest extends ApiTestCase
{
    protected string $endpoint = 'delete@api/v1/logout';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testLogout(): void
    {
        $response = $this->makeCall([], [
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMDAiLCJqdGkiOiI1ZTdlNDFhNTE4MWM3MTE2Y2UzNmMwOWIxMzhhMmVhZjE0YzBiMmYyZWQyNWExNDdhZGUzNWUyMjkxNDg3NTJmNGQyN2E1ZWZmZTI1N2FjNSIsImlhdCI6MTYyNTIyNTQxNS45Mzc2ODEsIm5iZiI6MTYyNTIyNTQxNS45Mzc2ODMsImV4cCI6MTYyNTMxMTgxNS44MDQ2MzgsInN1YiI6IjIiLCJzY29wZXMiOltdfQ.ikTrWQHmxHv14Vdb05dlQhtMctJR1XHzPHEIVGHnwMk9ZrB6APdIbF0hH5dURNTdA4RZQ90uSa25hCqcYlEt_Wdo5taYYLyfE9H1RtmF5jmawdYjklrZCUHoPXPaQcR-NIUZgDlRuyQJhgOku379KwnbfoYozT-v3JqWDOh2w2LEo0DuHlQZ71HHEZCdwptNXYe8RYWTmqvYN95jmGq6yL1_yzyLj4n1nxsQ02mMNl2rzhric_ofoJT_2PKNX6loyfaLXkrJ5yQW2wwce5DgGtXQGiDz9jQ-cnOXDDBNQ7NLAm0Zeol_g3hfgv8upquvy4KvJpwHsun9t8X3dCkxvKDwuR5gBRvk-qqiVLUv3Ns9rrJ8WujAqo_LZPEVHV_CF4Vp0Im7kyzngvbHo3YZcvMgfN6VMbmTLLhYxGFPS9jJyQwnN15AI-u9wFm15DVfZ4M4ItXgDQjQMNnhXawZQb4Z7vdRyrh-a43JEHyzJVxTSpUBc6s_OcF9PVNISDBQsHlz90xMljNNdB7Bovz1swRNoDRQmMR-XE0ESQKTIABbDs5cWlosvbLlqBjTPCrgFYiztKkTPGCUF9FwTwo2MSi3mJijGxl-AfJMGU2D7J33stuqvSD-vUTazcpPBM502qKYOSBNIGGq4uOHoa3YjBZvQJQV3crZQpbVb-KWhpE'
        ]);

        $response->assertStatus(202);
        $this->assertResponseContainKeyValue([
            'message' => 'Token revoked successfully.',
        ]);
    }
}
