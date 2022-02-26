#!/bin/bash

python -c "'\x00'+'a'*31" | nc 10.1.1.1 390001