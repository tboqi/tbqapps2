# -*- coding: UTF-8 -*-
from django.shortcuts import render
from django.http import HttpResponse

def index(request): 
    return HttpResponse("这里是首页")