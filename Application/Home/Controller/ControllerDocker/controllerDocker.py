#!/usr/bin/python

import docker 
import sys

def runContainerByid():
	client=docker.from_env()
	container=client.containers.run('jianhanke/desktop_false_hadoop',detach=True)
	print(container)
def startContainerById():
	client=docker.from_env()
	container=client.containers.get('8abf26049832')
	container.start()

def stopContainerById():
	client = docker.from_env()
	container=client.containers.get('8abf26049832')
	container.stop()

def deleteContainerByid():
	client=docker.from_env()
	container=client.containers.get('450ea63ccb1b')
	container.remove()
	print(container)
def getAllContainer():
	client=docker.from_env()
	lists=client.containers.list()
	for i in lists:
		print(i)
def showContainer():
	client = docker.from_env()
	container=client.containers.get('8abf26049832')
	print(container.attrs['Config'])
def pullImage():
	client = docker.from_env()
	info=client.images.pull('httpd')
	print(info)
def deleteImage(* args,** kwargs):
	client = docker.from_env()
	# [0]镜像名字 [1] 是否强制删除 [2] 是否删除未标记的父母
	client.images.remove(args[0],args[1],args[2])  
def ceshi():
	client = docker.from_env()
	lists=client.images.list()
	ids=lists[1].attrs['Id']
	return ids
def ceshi2():
	a="312"
	print(a)

	# for i in range(22,len(lists)):
	# 	print((lists[i].short_id))
	# 	
	
def getImagesInfoByName():
	client=docker.from_env()
	info=client.images.get_registry_data('httpd:2.4.37')
	print(info)

if __name__ == '__main__':
	ceshi2()
