# italc-config-creator

Italc-config-creator was built to quickly build the GlobalConfig.xml file for 
italc. Its goal is to allow administrators a quick and painless way of creating
the file without manually importing each computer 1 by 1. This is written in PHP
and should be capable of running on most platforms.

# How to use

Firstly download this repo.

Create a csv file with a, b, and c colums set to hostname, ip, and mac-address.
There is an example in ids.txt.

Place your csv data in ids.txt.

run `php runme.php "Classroom Name"`. 

Copy the new GlobalConfig.xml file to your client machine in `%appdata%/italc`.

Launch italc, and show all computers under your classroom.


# limitations

Can only do one classroom at a time. You could splice the xml together from 
multiple GlobalConfig.xml into one. Just copy everything between `<classroom ...> and </classroom>`
and place them under the current `</classroom>`.

Written in PHP, and can't be used as a website app. Maybe I will create one later, 
if people are interested.


# Tested Enviornments

italc:
    - Italc 3.0.3 (win)

Building the config:
    - Debian 8 with php7
    
# Coffee!
If you like my work, please buy me a cup of coffee! 
https://www.cameronmunroe.com/coffee


# License

    # italc-config-creator: Quickly create italc configs.
    # Copyright (C) {2017}  {Cameron Munroe ~ Mun }
	# munroenet@gmail.com 

    # This program is free software: you can redistribute it and/or modify
    # it under the terms of the GNU General Public License as published by
    # the Free Software Foundation, either version 3 of the License, or
    # (at your option) any later version.

    # This program is distributed in the hope that it will be useful,
    # but WITHOUT ANY WARRANTY; without even the implied warranty of
    # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    # GNU General Public License for more details.

    # You should have received a copy of the GNU General Public License
    # along with this program.  If not, see <http://www.gnu.org/licenses/>.