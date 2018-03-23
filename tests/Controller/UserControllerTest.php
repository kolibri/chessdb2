<?php declare(strict_types=1);

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector;

class UserControllerTest extends WebTestCase
{
    public function testRegisterWithLoginAndProfile()
    {
        $client = static::createClient();
        $client->enableProfiler();

        // go to register page
        $crawler = $client->request('GET', '/register');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('form[name="user_registration"]')->count());
        // fill in form
        $form = $crawler->selectButton('registration.form.button.submit')->form();
        $form['user_registration[username]'] = 'torbentester';
        $form['user_registration[email]'] = 'torben@tester.foo';
        $form['user_registration[aliases]'] = 'torben, tester';
        $form['user_registration[password][first]'] = 'testing';
        $form['user_registration[password][second]'] = 'testing';

        // submit form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirection());

        // check login
        $crawler = $client->request('GET', '/login');
        $this->assertTrue($client->getResponse()->isSuccessful());

        $form = $crawler->selectButton('login.form.label.submit')->form();
        $form['_username'] = 'torbentester';
        $form['_password'] = 'testing';

        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirection());
        $profile = $client->getProfile();
        /** @var  $security SecurityDataCollector */
        $security = $profile->getCollector('security');
        $this->assertSame('torbentester', $security->getUser());


        $crawler = $client->request('GET', '/profile/torbentester');
        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertEquals('torbentester', $crawler->filter('#username')->first()->text());
        $this->assertEquals('torben@tester.foo', $crawler->filter('#email')->first()->text());
        $this->assertEquals('torben, tester', $crawler->filter('#aliases')->first()->text());

    }
}
