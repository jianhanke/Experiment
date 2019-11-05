#!/usr/bin/python

import docker 
import sys

def commitContainerById(id):
	client=docker.from_env()
	container=client.containers.get(id)
	info=container.commit()
	return info.short_id[7:])

if __name__ == '__main__':
	commitContainerById(id)
	
