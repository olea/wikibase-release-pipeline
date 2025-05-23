ARG NGINX_IMAGE_URL
ARG NODE_IMAGE_URL
ARG WDQSQUERYGUI_COMMIT

# ###########################################################################
# hadolint ignore=DL3006
FROM ${NODE_IMAGE_URL} as builder

RUN git clone https://gerrit.wikimedia.org/r/wikidata/query/gui /tmp/wikidata-query-gui && \
    git -C /tmp/wikidata-query-gui checkout ${WDQSQUERYGUI_COMMIT} && \
    find /tmp/wikidata-query-gui -name ".git*" -exec rm -rf {} +

WORKDIR /tmp/wikidata-query-gui

# don't install chromium, it is not used
ENV PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=true

# TODO: what if we use the package lock? #reprobuilds
# we need dev dependencies to run 'npm run build'
RUN sed -i "/npm: '--production --no-package-lock'/c\npm: '--no-package-lock'" Gruntfile.js && \
    npm install && \
    npm run build

# ###########################################################################
# hadolint ignore=DL3006
FROM ${NGINX_IMAGE_URL}
LABEL org.opencontainers.image.source="https://github.com/wmde/wikibase-release-pipeline"

WORKDIR /usr/share/nginx/html

COPY --from=builder /tmp/wikidata-query-gui/build /usr/share/nginx/html
RUN echo "" > style.css
COPY logo.svg /usr/share/nginx/html/logo.svg
COPY entrypoint.sh /entrypoint.sh
COPY wdqs-frontend-config.json.template /templates/wdqs-frontend-config.json.template
COPY nginx-default.conf.template /templates/nginx-default.conf.template

RUN mkdir -p /config

ENV LANGUAGE=en \
    WIKIBASE_HOST="wikibase" \
    WDQS_HOST="wdqs" \
    WDQS_PORT="9999"

ENTRYPOINT ["/entrypoint.sh"]
CMD ["nginx", "-g", "daemon off;"]
