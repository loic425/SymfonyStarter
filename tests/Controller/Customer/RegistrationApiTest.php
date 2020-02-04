<?php

/*
 * This file is part of mz_159_s_demeus.
 *
 * (c) Mobizel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Tests\Controller\Customer;

use App\Entity\Customer\CustomerInterface;
use App\Tests\Controller\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationApiTest extends JsonApiTestCase
{
    /**
     * @test
     */
    public function it_allows_registering_a_new_customer()
    {
        $data =
            <<<EOT
        {
            "email": "marty.mcfly@future.com",
            "firstName": "Marty",
            "lastName": "McFly",
            "subscribedToNewsletter": true,
            "user": {
                "plainPassword": "chicken"
            }
        }
EOT;

        $this->client->request('POST', '/api/customers/register', [], [], [
            'CONTENT_TYPE' => 'application/json',
        ], $data);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'customer/register_response', Response::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function it_does_not_allow_to_registering_a_new_customer_with_existing_email()
    {
        $resources = $this->loadFixturesFromFile('authentication/api_user.yml');
        /** @var CustomerInterface $customer */
        $customer = $resources['customer'];
        $email = $customer->getEmail();

        $data =
            <<<EOT
        {
            "email": "$email",
            "firstName": "Marty",
            "lastName": "McFly",
            "subscribedToNewsletter": true,
            "user": {
                "plainPassword": "chicken"
            }
        }
EOT;

        $this->client->request('POST', '/api/customers/register', [], [], [
            'CONTENT_TYPE' => 'application/json',
        ], $data);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'customer/register_with_existing_email_response', Response::HTTP_BAD_REQUEST);
    }
}
