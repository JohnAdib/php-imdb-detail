# step 1, get list of movies

first need to get list of movies. because of permission problem we can't fetch list of directories outside of php exec folder and we need to do it manually.

you can run cmd as administator and go to folder of movies and run 'dir /b > list.txt'
this command get list of files in directory and copy them into a file named list.txt. copy that file beside of index.php of our project. we use example file.

# step 2, use exist library to fetch data from imdb site
https://github.com/FabianBeiner/PHP-IMDB-Grabber


