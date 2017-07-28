#!/bin/bash

export SENDMAIL=0
export DATE=`date '+%Y%m%d'`
export LOG_FILE=/path-to/logs/SimilarDocs/${DATE}+servplat.log

cd /path-to/

if [ -f "${LOG_FILE}" -a -s "${LOG_FILE}" ]; then
    LOG_SIZE=$(stat --printf="%s" ${LOG_FILE})

    if [ -f bytecounts ]; then
        BYTE_COUNTS=$(cat bytecounts)

        if [ $LOG_SIZE -gt $BYTE_COUNTS ]; then
            SENDMAIL=1
            echo ${LOG_SIZE} > bytecounts
        fi
    else
        SENDMAIL=1
        echo ${LOG_SIZE} > bytecounts
    fi

    if [ $SENDMAIL -eq 1 ]; then
        sendemail -f servplat@bireme.org -u "My VHL: Similar Documents Logging - ${DATE}" -m "CHECK ATTACHED FILE\n" -a ${LOG_FILE} -t mourawil@paho.org -cc barbieri@paho.org suporte@bireme.org -s [HOST] -xu [USER] -xp [PASS]
    fi
fi

cd -