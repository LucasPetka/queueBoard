# Queue System

Specialists accounts:
* john@email.com
* algkaspa@gmail.com
* rokjon@email.com

all passwords are: password123


## How to use application

When you open main page you can see two parts.
One part for customer another part for specialist. So now I will split it up and talk about each of the user cases.

### Customer
When customer opens the main page, firstly he wants to book an appointment which is clearly shown. When he opens "Appointment selection" he can choose from specialist where he want to go. When customer chooses the specialist and press "Reserve an appointment" he is going to be redirected to his ticket page with appointment code, specialist name and how many people are in front of his line and how much he needs to wait.
Also on that page he can cancel the appointment and choose another specialist. You can only choose to wait one specialist at a time. (So you can't wait in a queue for every specialist :) )

### Specialist
When specialist opens main page he can straight away log in or can create new specialist place for himself. When specialist logs in he can see all the queue that waiting for the appointment.
Specialist can only start appointments one after from first booked appointment so no missed customers and no duplication are going to happen. Also specialist can cancel and end the appointment and when he is ready start another one.

### Queue Board
"Queue board" button is on the main page and only logged in users can open Queue board.
On the queue board people can see specialist name, status of specialist (is he free or now waiting/working with person). And last column shows the queue of next 5 customers that are waiting.

