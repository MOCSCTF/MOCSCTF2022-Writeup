#!/usr/bin/python3

import os
os.environ['TERM'] = 'xterm-256color'
from random import randint
from asciimatics.screen import Screen
from time import sleep


flag = open('./flag.txt', 'r').read().strip()

banner=["""$$\      $$\  $$$$$$\   $$$$$$\   $$$$$$\   $$$$$$\ $$$$$$$$\ $$$$$$$$\  $$$$$$\   $$$$$$\   $$$$$$\   $$$$$$\  $$\ $$\\ """,
"""$$$\    $$$ |$$  __$$\ $$  __$$\ $$  __$$\ $$  __$$\\\\__$$  __|$$  _____|$$  __$$\ $$$ __$$\ $$  __$$\ $$  __$$\ $$ |$$ |""",
"""$$$$\  $$$$ |$$ /  $$ |$$ /  \__|$$ /  \__|$$ /  \__|  $$ |   $$ |      \__/  $$ |$$$$\ $$ |\__/  $$ |\__/  $$ |$$ |$$ |""",
"""$$\$$\$$ $$ |$$ |  $$ |$$ |      \$$$$$$\  $$ |        $$ |   $$$$$\     $$$$$$  |$$\$$\$$ | $$$$$$  | $$$$$$  |$$ |$$ |""",
"""$$ \$$$  $$ |$$ |  $$ |$$ |       \____$$\ $$ |        $$ |   $$  __|   $$  ____/ $$ \$$$$ |$$  ____/ $$  ____/ \__|\__|""",
"""$$ |\$  /$$ |$$ |  $$ |$$ |  $$\ $$\   $$ |$$ |  $$\   $$ |   $$ |      $$ |      $$ |\$$$ |$$ |      $$ |              """,
"""$$ | \_/ $$ | $$$$$$  |\$$$$$$  |\$$$$$$  |\$$$$$$  |  $$ |   $$ |      $$$$$$$$\ \$$$$$$  /$$$$$$$$\ $$$$$$$$\ $$\ $$\ """,
"""\__|     \__| \______/  \______/  \______/  \______/   \__|   \__|      \________| \______/ \________|\________|\__|\__|"""]


def show_banner(screen):
    i=0
    for txt in banner:
        screen.print_at(txt,0,i,colour=7,bg=3)
        i+=1
    screen.refresh()
    sleep(3)

def rainbow(screen):
    while True:
        n = randint(0, 250)
        msg='Welcom to MOCSCTF2021!!'
        if n == 30:
            msg = flag
        screen.print_at(msg,
                        randint(0, 118), randint(0, 8),
                        colour=randint(0, screen.colours - 1),
                        bg=randint(0, screen.colours - 1))
        screen.refresh()

Screen.wrapper(show_banner)
Screen.wrapper(rainbow)
