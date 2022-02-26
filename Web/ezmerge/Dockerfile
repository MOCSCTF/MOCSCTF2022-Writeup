FROM node:14

RUN mkdir -p /usr/src/app

WORKDIR /usr/src/app

COPY src/ .

RUN npm install

COPY flag  /flag
RUN chmod 4444 /flag


CMD [ "node", "index.js" ]