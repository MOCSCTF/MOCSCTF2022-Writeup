FROM python:3.6

RUN apt-get update \
    && apt-get install -y python3-pip

RUN mkdir /app
RUN adduser app --disabled-login --disabled-password

WORKDIR /app

COPY ./src .
RUN pip install --no-cache-dir -r requirements.txt

RUN chown -R app:app /app
USER app

CMD ["python3","./main.py"]
