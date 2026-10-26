FROM node:22

WORKDIR /app/frontend

COPY /frontend/package*.json .

RUN npm install -g @angular/cli 

RUN npm install

COPY /frontend/ .

CMD ["npm","start"]