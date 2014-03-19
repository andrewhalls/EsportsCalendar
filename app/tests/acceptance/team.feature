# features/user.feature
Feature: Testing the RESTfulness of the Index controller
  Let's see how RESTish this is

  
	Scenario: Creating a new Team
		Given that I want to make a new "Team"
		And that its "name" is "Fnatic"
		When I request "/team"
		And the response has a "id" property
		And the type of the "id" property is numeric
		Then the response status code should be 200
	
	Scenario: Finding a Team that exists
		Given that I want to find a "Team"
		And that its "id" is "1"
		When I request "/team"
		Then the "name" property equals "Fnatic"
		
	Scenario: Finding a Team that has never existed
		Given that I want to find a "Team"
		And that its "id" is "12389"
		When I request "/team"
		Then the response status code should be 404
		And the "message" property equals "Sorry, we cannot find this team."

	Scenario: Deleting a Team
		Given that I want to delete a "Team"
		And that its "id" is "1"
		When I request "/team"
		Then the "status" property equals "true"
			
	Scenario: Finding a Team that has been soft deleted
		Given that I want to find a "Team"
		And that its "id" is "1"
		When I request "/team"
		Then the response status code should be 404
		And the "message" property equals "Sorry, we cannot find this team."