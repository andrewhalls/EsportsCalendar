# features/search.feature
#Feature: Search
  #In order to see search results
  #As a website user
  #I need to be able to search for an item.
#
  #Scenario: Searching for a team that does exist
    #Given I am on "/search"
    #When I fill in "search" with "Example Team"
    #And I press "submit"
    #Then I should see "Example Team"
#
  #Scenario: Searching for a team that does NOT exist
    #Given I am on "/search"
    #When I fill in "search" with "This team does not exist."
    #And I press "submit"
    #Then I should see "No results found"
#	
  #Scenario: Searching for a broadcast that does exist
    #Given I am on "/search"
    #When I fill in "search" with "Example Broadcast"
    #And I press "submit"
    #Then I should see "Example Broadcast"
#
  #Scenario: Searching for a broadcast that does NOT exist
    #Given I am on "/search"
    #When I fill in "search" with "This Broadcast does not exist"
    #And I press "submit"
    #Then I should see "No results found"