Feature: Testing RESTful Channel.

Scenario: Creating a new Channel
		Given that I want to make a new "Channel"
		And that its "url" is "http://google.com"
		When I request "/channel"
		And the response has a "id" property
		And the type of the "id" property is numeric
		Then the response status code should be 200
	
	Scenario: Finding a Channel that exists
		Given that I want to find a "Channel"
		And that its "id" is "1"
		When I request "/channel"
		Then the "id" property equals "1"
		And the response status code should be 200
		
	Scenario: Finding a Channel that has never existed
		Given that I want to find a "Channel"
		And that its "id" is "12389"
		When I request "/channel"
		Then the response status code should be 404
		And the "message" property equals "Sorry, we cannot find this Channel."

	Scenario: Deleting a Channel
		Given that I want to delete a "Channel"
		And that its "id" is "1"
		When I request "/channel"
		Then the "status" property equals "true"
			
	Scenario: Finding a Channel that has been soft deleted
		Given that I want to find a "Channel"
		And that its "id" is "1"
		When I request "/channel"
		Then the response status code should be 404
