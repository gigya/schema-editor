schema-editor
=============

Used to manage a Gigya Registration-as-a-Service database schema. More information about the database schemas can be found here:
http://developers.gigya.com/display/GD/Identity+Storage
http://developers.gigya.com/display/GD/Data+Store

This tool is currently hosted at: https://tools.gigya-cs.com/schema/

The tool allows you to manage Registration-as-a-Service (Identity Storage) and Data Store database schemas.
It uses the following publicly documented Gigya APIs:
http://developers.gigya.com/display/GD/accounts.getSchema+REST
http://developers.gigya.com/display/GD/accounts.setSchema+REST
http://developers.gigya.com/display/GD/ds.getSchema+REST
http://developers.gigya.com/display/GD/ds.setSchema+REST

The tool requires you to have access to a Gigya API key and the associated partner secret in order to make changes to a schema.

For other relevant tools, please see the Gigya-RaaS-Toolkit located here: https://github.com/scotthovestadt/gigya-raas-toolkit