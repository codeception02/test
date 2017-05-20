Feature: test
  Background:
    Given I am on the homepage

  Scenario: test
    Given I click on login button
    And I am sign into to admin dashboard as "admin@clevergig.nl" with "admin"
    And I click the Gigs tab on menu section
    And I click first view expired button
    And I verify that this is a expired text on the open page









