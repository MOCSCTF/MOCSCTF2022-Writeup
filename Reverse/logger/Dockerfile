# sudo docker build -t log4j .
# sudo docker run -d -p 1024:1024 --rm -it log4j

# FROM ubuntu:19.10
FROM debian:bullseye

# Install deps.
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        default-jre-headless && \
    rm -rf /var/lib/apt/lists/

RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
RUN echo "ctf:ctf" | chpasswd

WORKDIR /home/ctf

COPY . .

RUN chmod +x run.sh

RUN chown -R root:root /home/ctf

USER ctf
EXPOSE 1024
CMD ./ynetd -p 1024 "SECRET_VALUE='$(cat /home/ctf/flag)' ./run.sh"
