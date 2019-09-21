#!/usr/bin/python

from win32com import client as wc
import sys

def saveHtm():
	# print(wordPath)
	# print(htmPath)
	wordPath='E:/wamp/apache/library/Experiment/Course/MySql/MySql第一章节/1.doc'
	htmPath='E:/wamp/apache/library/Experiment/Course/MySql/MySql第一章节/1.htm'
	word = wc.Dispatch('Word.Application')
	print(word) 
	doc = word.Documents.Open('E:/wamp/apache/library/Experiment/Course/MySql/MySql第一章节/1.doc') 

	doc.SaveAs("E:/wamp/apache/library/Experiment/Course/MySql/MySql第一章节/1.htm", 8) 
	# doc.Close() 
	# word.Quit()

if __name__ == '__main__':
	saveHtm()
	# saveHtm("E:/wamp/apache/library/Experiment/Course/MySql/MySql第一章节/1.doc",'E:/wamp/apache/library/Experiment/Course/MySql/MySql第一章节/1.htm')