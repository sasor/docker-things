FROM ruby:alpine

ARG USER=dev
ARG GROUP=dev
ARG UID=1000
ARG GID=1000


#RUN apk update && apk add bash nodejs build-base libxml2-dev libxslt-dev postgresql postgresql-dev ruby-dev
RUN set -ex \
 && apk add --update --no-cache build-base postgresql-dev tzdata nodejs bash

# addgroup -S [group system] -g[similar to --gid with number group]
# adduser -D[no-password] -S[system user] -u[similar to --uid] -G[group belong the user]
RUN set -x \
 && addgroup -S -g ${GID} ${GROUP} \
 && adduser -D -S -u ${UID} -G ${GROUP} ${USER}

USER ${USER}

ENV HOME /home/${USER}
ENV BUNDLE_APP ${HOME}/.local/bundle 
ENV BUNDLE_PATH ${HOME}/.local/bundle 
ENV BUNDLE_HOME ${HOME}/.local/bundle 
ENV GEM_HOME ${HOME}/.local/bundle/
ENV GEM_PATH ${HOME}/.local/bundle/bin

RUN mkdir -p ${HOME}/.local/bundle
# https://stackoverflow.com/questions/44766665/how-do-i-docker-copy-as-non-root
COPY --chown=dev:dev gemrc ${BUNDLE_HOME}/.gemrc
COPY --chown=dev:dev rails.base.tar.gz ${HOME}/

RUN gem install bundler \
 && gem install rails

ENV PATH ${GEM_PATH}:$PATH

# Opcional..
RUN mkdir ${HOME}/src
WORKDIR ${HOME}/src
ADD --chown=dev:dev Gemfile Gemfile.lock ./
RUN bundle install
