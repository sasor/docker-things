FROM node:alpine

# resulta que la imagen node:alpine tiene el usuario node con id 1000 y gid 1000
#ARG USER=dev
#ARG GROUP=dev
#ARG UID=1001
#ARG GID=1001

RUN yarn global add create-react-app 
USER node

ENV HOME /home/node
ENV OFFLINE_YARN_DIR ${HOME}/.offline-packages

RUN mkdir ${OFFLINE_YARN_DIR} \
 && yarn config set yarn-offline-mirror ${OFFLINE_YARN_DIR} \
 && yarn config set yarn-offline-mirror-pruning true

WORKDIR ${HOME}
COPY --chown=node:node package.json ${HOME}/
RUN yarn install \
 && rm -rf node_modules yarn.lock
