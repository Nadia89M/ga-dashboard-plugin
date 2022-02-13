# Project Title

Google Analytics Dashboard Plugin

## Description

Easily add GA to a Wordpress project and have a selection of metrics displayed

### Installing

* Download the project from this repository as a ZIP file
* Upload the ZIP file in the Plugins section of your Wordpress Admin Dashbaord

### Setting Configuration

Enter the Google Analytics ID and the View ID in the settings section of the plugin. 

### Project Requirements

* retrive GA data and decide through the plugin settings which data to display
* display data through specific metrics and data visualisation

### Project Timeline

The project started on the 13th of November and it was finalised on the 30th of December. 

### Project Issues and Fixes

I ecountered a blocker during the project, while working on setting up a CI for the plugin repository using travis. When running "ssh-copy-id -i deploy_rsa.pub <ssh-user>@<deploy-host>" to copy the ssh keys into Lightsail, I got this error "Permission denied, please try again."

The solution was to manually add the keys as authorized keys using the Lightsail console and by running "nano .ssh/authorized_keys", pasting the ssh keys and saving the changes. 
