from django.db import models

# Create your models here.
class Practice(models.Model):
    name =  models.CharField(max_length=125, blank = False)
    address1 = models.TextField()
    address2 = models.TextField()
    phone = models.CharField(max_length=15, blank=True)
    email_id = models.EmailField(blank=True)
    created_at = models.DateField( auto_now=False, auto_now_add=True)
    update_at = models.DateField( auto_now=True, auto_now_add=False)

    def __str__(self):
        self.name

    class Meta:
        db_table = "practice"
