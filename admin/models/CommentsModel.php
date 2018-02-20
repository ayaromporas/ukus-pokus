<?php
class CommentsModel extends Model{

	public function Index(){

		$this->query('SELECT comments.comment_id, comments.comment_name, comments.comment_email, comments.comment_text, comments.comment_time, comments.status, recipes.recipe_id, recipes.recipe_title FROM comments LEFT JOIN recipes ON comments.recipe_id = recipes.recipe_id  WHERE comments.status=2 ORDER BY comments.comment_time ASC LIMIT 12');

		$comments = $this->resultSet();

		$resultArray = array($comments);

		return $resultArray;
		
	}

		
}