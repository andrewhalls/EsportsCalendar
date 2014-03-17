# features/user.feature
Feature: Testing the RESTfulness of the Index controller
  Let's see how RESTish this is

  Scenario: Creating a new Broadcast
    Given that I want to make a new "Broadcast"
    And that its "title" is "EMS One Katowice"
    When I request "/broadcast"
    And the response has a "id" property
    And the type of the "id" property is numeric
    Then the response status code should be 200

  Scenario: Finding a Broadcast
    Given that I want to find a "Broadcast"
    And that its "id" is "1"
    When I request "/broadcast"
    Then the "title" property equals "EMS One Katowice"

  Scenario: Deleting a Broadcast
    Given that I want to delete a "Broadcast"
    And that its "id" is "1"
    When I request "/broadcast"
    Then the "status" property equals "true"