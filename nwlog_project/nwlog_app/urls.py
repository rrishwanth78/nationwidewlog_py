from django.urls import path 
from nwlog_app import views

urlpatterns = [
    path('', views.index, name = 'home'),
    path('signin/', views.signin, name = 'signin'),
]
