Feature:
    in order to check that the features that the page works
    As a user
    I want to have these scenarios

    Scenario: display the register page
        When go to "/register"
        Then I should see "Inscription"

    Scenario: register on the application
        When go to "/register"
        And I fill in "Pseudo *" with "username Testing"
        And I fill in "Présentation" with "description Testing"
        And I fill in "Pays *" with "country Testing"
        And I fill in "Ville" with "address Testing"
        And I fill in "Nom" with "name Testing"
        And I fill in "Prénom" with "firstName Testing"
        And I fill in "Email *" with "email Testing"
        And I select "01" from "register_form_dateBirth_day"
        And I select "01" from "register_form_dateBirth_month"
        And I select "2021" from "register_form_dateBirth_year"
        And I fill in "Mot de passe *" with "1"
        And I fill in "Ré-écrivez le mot de passe *" with "1"
        And I check "J'accepte les conditions d'utilisation de l'application *"
        And I press "Valider"
        Then I should see "Inscription"


    Scenario: confirmation of an account on the application
        Given I created an account I receive an email to confirm my registration
        When I click on the email link
        Then I should see "votre compte est confirmé, vous pouvez des à présent vous connecter au site."