#! /usr/bin/env python

import argparse
import httplib

ZING_DOMAIN = "star.zing.vn"
ZING_URL = "/includes/fnGetSongInfo.php?id="

def run(args):
    print "Site:  " + args.site
    print "ID:  " + args.id

    domain = ZING_DOMAIN
    url = ZING_URL
    beatID = args.id

    h = httplib.HTTP(domain)
    h.putrequest('GET', url + beatID)
    h.putheader('Host', domain)
    h.putheader('User-agent', 'firefox')
    h.endheaders()
    
    returncode , returnmsg, headers = h.getreply()
    if returncode == 200: #OK
        html = h.getfile().read()
        print html

### PARSE ARGUMENTS ###
def parseArguments():
    parser = argparse.ArgumentParser(description="Retrieve beats from other stes")
    parser.add_argument("-site", help="source of beat files which we need to get", default="zing")
    parser.add_argument("id", help="ID of beat")
    args = parser.parse_args()
    return args



if __name__=="__main__":
    run(parseArguments())
