# chatbox
A website to chat with others anonymously is created using HTML, CSS, BOOTSTRAP(CSS FRAMEWORK), JAVASCRIPT, and PHP.
The frontend of website gives an user to create a chat room or either join one if it is already created.
Once you create a room, name of a room is recorded in database and user is redirected to a chat page where you can chat. For sharing that chat room user have to copy the URL of that page and share it to others, paste that link in inputbox and click on join room and it will redirect you to that chatroom.
If someone tries to create a room with the name that already exist in database it will not allow it and will ask to create a room with different name.

Once you are in the chatroom, you will see chatbox and one input box. when you type your message in input box and click on "send" button, it will store that message in database, and one different function is available, which checks database every 1000ms(1s), if the any new entry in the database in done with that room name or not,if it is the it displays that message in chatbox.
