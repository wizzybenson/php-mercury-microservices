FROM nginx:stable

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        bc \
        curl \
        unzip \
    && rm -rf /var/lib/apt/lists/*

COPY config/ /etc

CMD [ "nginx", \
        "-g", \
        "daemon off;"]