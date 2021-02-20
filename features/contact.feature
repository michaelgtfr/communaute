Feature:
  in order to check that the features that the page works
  As a user
  I want to have these scenarios

  Scenario: display the contact page
    When go to "contact"
    Then the response status code should be 200

  Scenario: send the contact message
    Given I am on "contact"
    And I fill in "Email" with "email@gmail.com"
    And I fill in "Nom/Pseudo" with "username Testing"
    And I fill in "Message" with "content Testing"
    And I press "Valider"
    Then I should see "Votre message à été enregistré, vous recevrez dans les plus bref délais une réponse dans votre boite email"