Feature: Developer reads and write from a file
  As a developer
  I want to read and write from a file
  So that I connect to all sorts of protocols uniformly

  Scenario: Writing a simple text to a file using linux socket
    Given I have the following text:
    """
    mamma mia here we go again
    """
    When you save it to "mamamia.sock"
    Then I should see the text in it:
    """
    mamma mia here we go again
    """