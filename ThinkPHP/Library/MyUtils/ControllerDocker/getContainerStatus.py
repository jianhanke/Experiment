#!/usr/bin/python
import docker 
import sys


def getContainerStatus(container_id):
	client = docker.from_env()
	container=client.containers.get(container_id)
	print(container.attrs['State']['Status'])


if __name__ == '__main__':
	getContainerStatus(sys.argv[1])
