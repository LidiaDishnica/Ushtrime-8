Feature: Search a name from gjirafa and duckduckgo.

Scenario: Search a name from duckduckgo
Given I am into the page duckduckgo 
And I have written the name Klesti Hoxha in the search bar
When I press search button
Then show the result for Klesti Hoxha

Scenario: Search a name from gjirafa
Given I am into the page gjirafa 
And I have written the name Klesti Hoxha in the search bar
When I press search button
Then show the result for Klesti Hoxha
