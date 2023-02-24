from django.shortcuts import render, HttpResponse
from django.shortcuts import redirect
from django.http import JsonResponse
import json
from .models import Practice
from django.contrib import messages
#from django.utils import simplejson
from django.core import serializers
from django.http import JsonResponse
from django.template.loader import render_to_string

def practice_get(request):
    id = 0
    rows = {}
    message = "";
    status = 0;
    if request.method == "GET":
        #id = request.GET("id", 0)
        id = request.GET.get("id", 0)
        print(id)
        id = "{0}".format(id)
        id = int( id )

    if (id > 0):
        rows = Practice.objects.filter(pk = id).values()
        if ( rows.exists() == False ):
            message = "Record not found"
            status = 0
        else:
            status = 1 

    data = {}
    data["status"] = status
    data["message"] = message
    data["data"] = list(rows)
    params = data
    return JsonResponse(params)

def practice_list_view(request):
    id = 0
    rows = {}
    message = "";
    status = 0;
    html_text = "";
    if request.method == "POST":
        id = request.POST.get("id", 0)

    rows = Practice.objects.all()
    if ( rows.exists() == False ):
        message = "Record not found"
    else:
        status = 1 
        html_text = render_to_string('practice_list_table.html', {"rows" : rows})

    data = {}
    data["data"] = {}
    data["status"] = status
    data["message"] = message
    #data["rows"] = list(rows)
    data["view"] = html_text
    params = data
    return JsonResponse(params)

def practice_get_view(request):
    id = 0
    rows = {}
    message = "";
    status = 0;
    if request.method == "GET":
        #id = request.GET("id", 0)
        id = request.GET.get("id", 0)
        print(id)
        id = "{0}".format(id)
        id = int( id )

    if (id > 0):
        rows = Practice.objects.filter(pk = id).values()
        if ( rows.exists() == False ):
            message = "Record not found"
        else:
            status = 1 

    html_text = render_to_string('practice_list_table.html', {"rows" : rows})
    data = {}
    data["status"] = status
    data["message"] = message
    #data["rows"] = list(rows)
    data["view"] = html_text
    params = data
    return JsonResponse(params)
    #return params

def practice_list(request):
    rows = Practice.objects.all()
    #print(rows[0])
    params = {}
    params["rows"] = rows
    return render(request, 'practice_list.html', params)

def practice_save1(request):
    data = {}
    params = { "data" : data}
    return render(request, 'practice_list.html', params)

def practice_save(request):
    id = request.POST.get("id", 0)
    name = request.POST.get("name", "")
    address1 = request.POST.get("address1", "")
    address2 = request.POST.get("address2", "")
    email_id = request.POST.get("email_id", "")
    phone = request.POST.get("phone", "")

    practice = Practice();
    if (id > 0):
        practice = Practice.objects.get(pk=id)

    practice.name = name.strip()
    practice.address1 = address1.strip()
    practice.address2 = address2.strip()
    practice.email_id = email_id.strip()
    practice.phone = phone.strip()
    practice.save()

    params = {}
    if id > 0:
        stg = "Practice updated successfully";
    else:
        stg = "Practice is add successfully";
    messages.info(request, stg)
    return redirect('practice_list')

def practice_get(request):
    id = 0
    rows = {}
    message = "";
    status = 0;
    if request.method == "GET":
        #id = request.GET("id", 0)
        id = request.GET.get("id", 0)
        print(id)
        id = "{0}".format(id)
        id = int( id )

    if (id > 0):
        rows = Practice.objects.filter(pk = id).values()
        if ( rows.exists() == False ):
            message = "Record not found"
            status = 0
        else:
            status = 1 

    data = {}
    data["status"] = status
    data["message"] = message
    data["data"] = list(rows)
    params = data
    return JsonResponse(params)

def practice_delete(request):
    id = 0
    rows = {}
    message = "";
    status = 0;
    if request.method == "GET":
        #id = request.GET("id", 0)
        id = request.GET.get("id", 0)
        print(id)
        id = "{0}".format(id)
        id = int( id )

    if (id > 0):
        rows = Practice.objects.get(pk = id)
        if ( rows is None ):
            message = "Record not found"
            status = 0
        else:
            rows.delete();
            status = 1 
            message = "Delete success"

    data = {}
    data["status"] = status
    data["message"] = message
    data["data"] = {}
    params = data
    return JsonResponse(params)
