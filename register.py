#! /usr/bin/env python

import argparse
#from __future__ import print_function
import re
#import nmap
import hashlib
import datetime
import logging


T_OK          = 1
T_ERR_EXIST   = -1
T_ERR_WRONG   = -2
T_ERR_INVALID = -3
T_ERR_TOO_SHORTPASS = -4
T_ERR_GENERIC = -99

DATA_FILE = 'users'
LOGIN_TOKENS = 'login_tokens'

logger = logging.getLogger('register')
hdlr = logging.FileHandler('apps.log')
formatter = logging.Formatter('%(asctime)s %(levelname)s %(message)s')
hdlr.setFormatter(formatter)
logger.addHandler(hdlr)
logger.setLevel(logging.INFO)

def create(username, password):

    if not username or not password:
        print "Username or password is not valid"
        return T_ERR_INVALID

    f = open(DATA_FILE, 'rw+')
    #s = nmap.nmap(f.fileno(), 0, access=nmap.ACCESS_READ)
    for line in f:
        # if username has already taken
        if "[[" + username + "]]" in line:
            f.close()
            return T_ERR_EXIST
    
    if len(password) < 4:
        return T_ERR_TOO_SHORTPASS

    f.write("[[" + username + "]]:" + "[[" + hashlib.md5(password).hexdigest() + "]]:[[" + datetime.datetime.utcnow().ctime() + "]]\n" )
    f.close()
    return T_OK

def login(username, password):
    f = open(DATA_FILE, 'r')
    passE = hashlib.md5(password).hexdigest()
    tmp = "[[" + username + "]]:[[" + passE + "]]"
    logger.info("user " + username + " is logging in")
    for line in f:
        if tmp in line:
            try:
                tokenfile = open(LOGIN_TOKENS,'w')
                token = hashlib.md5(tmp).hexdigest()
                tokenfile.write(token + " " + datetime.datetime.utcnow().ctime())
            except:
                logger.error("Error when open file " + LOGIN_TOKENS)
            tokenfile.close()
            
            return (T_OK, token)

    return (T_ERR_INVALID, "")

def run(args):
    if args.operation:

        if args.operation == 'create':
            result = create(args.username, args.password)
            if (result == T_OK):
                logger.info("Create account successfully")
            elif (result == T_ERR_EXIST):
                logger.info("username " + args.username + " already exists")
            elif (result == T_ERR_INVALID):
                logger.info( "Invalid username")
            elif (result == T_ERR_TOO_SHORTPASS):
                logger.info("Password is too short. Please choose password has more than 3 characters")
            elif (result == T_ERR_GENERIC):
                logger.info( "There is some problems when creating account")
            return result

        elif args.operation == 'login':
            result,token = login(args.username, args.password)

            if (result == T_OK):
                logger.info("LOGIN Sucessully")
                return token
            elif (result == T_ERR_INVALID):
                logger.info("Invalid username or password")
                return "" 


### PARSE ARGUMENTS ###
def parseArguments():
    #print "parse"
    parser = argparse.ArgumentParser(description="Register/Login an new account")
    parser.add_argument("operation", choices=['create', 'login'], help="Operation which we need to process ['create' or 'login']")
    parser.add_argument("-u", "--username", help="User name")
    parser.add_argument("-p", "--password", help="Password")
    args = parser.parse_args()
    return args

if __name__ == "__main__":
    #print "Main"
    run(parseArguments())
