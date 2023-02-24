from django.shortcuts import render, HttpResponse, redirect
from django.conf import settings
from django.contrib import admin
from django.contrib import messages
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required
from django.http import JsonResponse
from django.views.generic.edit import CreateView
from django.urls import reverse_lazy

# Create your views here.

def index(request):
    domain = request.scheme + "://" +  request.META['HTTP_HOST']
    data = {'domain' : domain}
    return render(request, 'login.html', data)

def signin(request):
    if request.method == "POST":
        if signin_action(request) == True:
            return redirect('/practice/list/')
            #return redirect('/')
        else:
            return redirect('/')
    else:
        return render(request, 'login.html')
    return render(request, 'login.html')

def logout_action(request):
    logout(request)
    messages.info(request,"Logout Success")
    return redirect('/signin')

def signin_action(request):
    email = request.POST.get('email')
    username = request.POST.get('username')
    password = request.POST.get('password')
    myuser = authenticate(username = email, password = password)

    if myuser is not None:
        login(request,myuser)
        messages.success(request,"Login Success")
        return True
    else:
        messages.error(request,"Invalid Credentials")
        return False
        #return render(request,'login.html')  

