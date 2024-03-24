package main

import (
    "net/http"

    "github.com/gin-gonic/gin"
)

type user struct {
    Email     string  `json:"email" binding:"required,email"`
    Password  string  `json:"password"`
    FirstName string  `json:"firstName"`
    LastName  string  `json:"lastName"`
}

func main() {
    router := gin.Default()
	router.POST("/users", postUsers)

    router.Run("localhost:8080")
}

func postUsers(context *gin.Context) {
    var newUser user

    if err := context.BindJSON(&newUser); err != nil {
		context.AbortWithStatusJSON(http.StatusBadRequest,
			gin.H{
				"error": "ERROR",
				"message": err.Error()})
        return
    }

    context.IndentedJSON(http.StatusCreated, newUser)
}