<?php
$birth_data = 'CREATE TABLE "birth_data" (
	"id"	INTEGER NOT NULL UNIQUE,
	"name"	TEXT,
	"name_m"	TEXT,
	"sex"	TEXT,
	"DOB"	TEXT,
	"placeOfBirth"	TEXT,
	"placeOfBirth_m"	TEXT,
	"nameOfMother"	TEXT,
	"nameOfMother_m"	TEXT,
	"nameOfFather"	TEXT,
	"nameOfFather_m"	TEXT,
	"motherAadharNo"	INTEGER,
	"fatherAadharNo"	INTEGER,
	"addressDuringBirth"	TEXT,
	"addressDuringBirth_m"	TEXT,
	"permanentAddressOfParents"	TEXT,
	"permanentAddressOfParents_m"	TEXT,
	"remark"	TEXT,
	"dateOfRegistration"	TEXT,
	"dateOfIssue" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);';

$marriage_data = 'CREATE TABLE "marriage_data" (
	"id"	INTEGER NOT NULL UNIQUE,
	"husbandName"	TEXT,
	"husbandName_m"	TEXT,
	"wifeName"	TEXT,
	"wifeName_m"	TEXT,
	"husbandAge"	INTEGER,
	"wifeAge"	INTEGER,
	"husbandAadharNo" INTEGER,
	"wifeAadharNo" INTEGER,
	"husbandReligion"	TEXT,
	"husbandReligion_m"	TEXT,
	"wifeReligion"	TEXT,
	"wifeReligion_m"	TEXT,
	"husbandNationality"	TEXT,
	"husbandNationality_m"	TEXT,
	"wifeNationality"	TEXT,
	"wifeNationality_m"	TEXT,
	"husbandFatherName"	TEXT,
	"husbandFatherName_m"	TEXT,
	"wifeFatherName"	TEXT,
	"wifeFatherName_m"	TEXT,
	"husbandAddress"	TEXT,
	"husbandAddress_m"	TEXT,
	"wifeAddress"	TEXT,
	"wifeAddress_m"	TEXT,
	"dateOfMarriage"	TEXT,
	"placeOfMarriage"	TEXT,
	"placeOfMarriage_m"	TEXT,
	"dateOfRegistration"	TEXT,
	"dateOfIssue" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);';

$death_data = 'CREATE TABLE "death_data" (
	"id"	INTEGER NOT NULL UNIQUE,
	"name"	TEXT,
	"name_m"	TEXT,
	"sex"	TEXT,
	"aadharNo"	INTEGER,
	"dateOfDeath"	TEXT,
	"placeOfDeath"	TEXT,
	"placeOfDeath_m"	TEXT,
	"age"	INTEGER,
	"nameOfHusband_Wife"	TEXT,
	"nameOfHusband_Wife_m"	TEXT,
	"aadhaarOfHusband_Wife"	INTEGER,
	"nameOfMother"	TEXT,
	"nameOfMother_m"	TEXT,
	"nameOfFather"	TEXT,
	"nameOfFather_m"	TEXT,
	"motherAadhaar"	INTEGER,
	"fatherAadhaar"	INTEGER,
	"addressDuringDeath"	TEXT,
	"addressDuringDeath_m"	TEXT,
	"permanentAddressOfDeceased"	TEXT,
	"permanentAddressOfDeceased_m"	TEXT,
	"remark"	TEXT,
	"dateOfRegistration"	TEXT,
	"dateOfIssue" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);';


$user_auth = 'CREATE TABLE "user_auth" (
	"id"	INTEGER NOT NULL UNIQUE,
	"username"	TEXT,
	"password"	TEXT,
	"questionAnswer"	TEXT,
	"priority" INTEGER,
	PRIMARY KEY("id" AUTOINCREMENT)
);';


$password = password_hash("@Admin#Default", PASSWORD_BCRYPT);
$add_default_user = "INSERT INTO user_auth VALUES(1, 'admin', '$password', '', 0)";


$birth_data_deleted = 'CREATE TABLE "birth_data_deleted" (
	"id"	INTEGER NOT NULL UNIQUE,
	"name"	TEXT,
	"name_m"	TEXT,
	"sex"	TEXT,
	"DOB"	TEXT,
	"placeOfBirth"	TEXT,
	"placeOfBirth_m"	TEXT,
	"nameOfMother"	TEXT,
	"nameOfMother_m"	TEXT,
	"nameOfFather"	TEXT,
	"nameOfFather_m"	TEXT,
	"motherAadharNo"	INTEGER,
	"fatherAadharNo"	INTEGER,
	"addressDuringBirth"	TEXT,
	"addressDuringBirth_m"	TEXT,
	"permanentAddressOfParents"	TEXT,
	"permanentAddressOfParents_m"	TEXT,
	"remark"	TEXT,
	"dateOfRegistration"	TEXT,
	"dateOfIssue" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);';

$marriage_data_deleted = 'CREATE TABLE "marriage_data_deleted" (
	"id"	INTEGER NOT NULL UNIQUE,
	"husbandName"	TEXT,
	"husbandName_m"	TEXT,
	"wifeName"	TEXT,
	"wifeName_m"	TEXT,
	"husbandAge"	INTEGER,
	"wifeAge"	INTEGER,
	"husbandAadharNo" INTEGER,
	"wifeAadharNo" INTEGER,
	"husbandReligion"	TEXT,
	"husbandReligion_m"	TEXT,
	"wifeReligion"	TEXT,
	"wifeReligion_m"	TEXT,
	"husbandNationality"	TEXT,
	"husbandNationality_m"	TEXT,
	"wifeNationality"	TEXT,
	"wifeNationality_m"	TEXT,
	"husbandFatherName"	TEXT,
	"husbandFatherName_m"	TEXT,
	"wifeFatherName"	TEXT,
	"wifeFatherName_m"	TEXT,
	"husbandAddress"	TEXT,
	"husbandAddress_m"	TEXT,
	"wifeAddress"	TEXT,
	"wifeAddress_m"	TEXT,
	"dateOfMarriage"	TEXT,
	"placeOfMarriage"	TEXT,
	"placeOfMarriage_m"	TEXT,
	"dateOfRegistration"	TEXT,
	"dateOfIssue" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);';

$death_data_deleted = 'CREATE TABLE "death_data_deleted" (
	"id"	INTEGER NOT NULL UNIQUE,
	"name"	TEXT,
	"name_m"	TEXT,
	"sex"	TEXT,
	"aadharNo"	INTEGER,
	"dateOfDeath"	TEXT,
	"placeOfDeath"	TEXT,
	"placeOfDeath_m"	TEXT,
	"age"	INTEGER,
	"nameOfHusband_Wife"	TEXT,
	"nameOfHusband_Wife_m"	TEXT,
	"aadhaarOfHusband_Wife"	INTEGER,
	"nameOfMother"	TEXT,
	"nameOfMother_m"	TEXT,
	"nameOfFather"	TEXT,
	"nameOfFather_m"	TEXT,
	"motherAadhaar"	INTEGER,
	"fatherAadhaar"	INTEGER,
	"addressDuringDeath"	TEXT,
	"addressDuringDeath_m"	TEXT,
	"permanentAddressOfDeceased"	TEXT,
	"permanentAddressOfDeceased_m"	TEXT,
	"remark"	TEXT,
	"dateOfRegistration"	TEXT,
	"dateOfIssue" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);';



/*


1birth/connection.php
2marriage/connection.php
3death/connection.php
print/connection.php


*/