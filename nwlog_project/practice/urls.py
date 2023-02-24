from django.urls import path
from practice import views

urlpatterns = [
    path('', views.practice_list),
    path('list/', views.practice_list, name="practice_list"),
    path('list/view', views.practice_list_view, name="practice_list_view"),
    path('save/', views.practice_save, name = "practice_save"),
    path('update/', views.practice_save, name = "practice_save"),
    path('get/', views.practice_get, name = "practice_get"),
    path('delete/', views.practice_delete, name = "practice_delete"),
    path('get/view/', views.practice_get_view, name = "practice_get_view"),
]

