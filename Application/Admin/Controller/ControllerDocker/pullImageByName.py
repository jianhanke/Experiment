#!/usr/bin/python
import docker 
import sys


def pullImageByName(imageName):
	client = docker.from_env()
	image=client.images.pull(imageName)
	shortId=image.attrs['Id']
	print(shortId[7:19])

if __name__ == '__main__':
	pullImageByName(sys.argv[1])
