<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Stryder\Socket\Client;

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $input;

    /**
     * @BeforeScenario
     */
    public function createWorkDir()
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->workDir = sys_get_temp_dir() . $ds . uniqid('Stryder_') . $ds;

        mkdir($this->workDir, 0777, true);
        chdir($this->workDir);
    }

    /**
     * @AfterScenario
     */
    public function removeWorkDir()
    {
        //system('rm -rf '.$this->workDir);
    }

    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^I have the following text:$/
     */
    public function iHaveTheFollowingText(PyStringNode $string)
    {
        $this->input = (string) $string;
    }

    /**
     * @When /^you save it to "([^"]*)"$/
     */
    public function youSaveItTo($path)
    {
        $path = $this->workDir . $path;
        fopen($path, 'wb');
        $client = new Client('unix://' . $path);
        $client->write($this->input);
    }

    /**
     * @Given /^I should see the text in it:$/
     */
    public function iShouldSeeTheTextInIt(PyStringNode $string)
    {

    }

}
