<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends \samsonframework\behatextension\GenericFeatureContext  implements \tPayne\BehatMailExtension\Context\MailAwareContext
{

    use \tPayne\BehatMailExtension\Context\MailTrait;


    public function iAmOnHome()
    {
        $this->spin(function (FeatureContext $context) {
            $context->iAmOnHomepage();
            return true;
        });
    }

    /**
     * @Given I click on login button
     */
    public function iClickOnLoginButton()
    {
        $this->iClickOnTheElement('.topSection .topSection__menu li:nth-child(3)');
        $this->iWaitMillisecondsForResponse();
    }
    
    /**
     * @Then I click first view expired button
     */
    public function iClickFirstViewExpiredButton()
    {
        for ($i = 2; $i <= 10; $i++) {
            if (trim($this->findByCssSelector('#app .table tbody tr:nth-child(' . $i . ') td .status')->getText()) === 'Expired') {
                $this->iClickOnTheElement('tr:nth-child(2) > td.actions > a:nth-child(1)');
            };

        }
    }

    /**
     * @Then I verify that this is a expired text on the open page
     */
    public function iVerifyThatTisIsExpired()
    {
        if (trim($this->findByCssSelector('#app .table tbody tr:nth-child(' . $i . ') td .status')->getText()) !== 'Expired') {
            throw new \Exception('Item has not status expired');
        }
    }

    /**
     * @Given I am sign into to admin dashboard as :arg1 with :arg2
     */
    public function iAmSignIntoToAdminDashboardAsWith($arg1, $arg2)
    {
        $this->fillField('email', $arg1);
        $this->fillField('password', $arg2);
        $this->pressButton('Login');
        $this->getSession()->wait(2000);
    }

    /**
     * @Given I click the Gigs tab on menu section
     */
    public function iClickTheGigsTabOnMenuSection()
    {
        $this->iClickOnTheElement('.sidebar-menu li:nth-child(2) .fa.fa-calendar');
        $this->iWaitMillisecondsForResponse();
    }


    /**
     * @Then I see dashboard page
     */
    public function iSeeErrorMessage()
    {
        $this->spin(function (FeatureContext $context) {
            $context->assertElementOnPage('.help-block.help-block-error');
            return true;
        });
    }




}
