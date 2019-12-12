
<?php
class BookingForm extends Form{

	public function build()
	{
		$this->addFormField('day');
		$this->addFormField('month');
		$this->addFormField('year');
		$this->addFormField('hour');
		$this->addFormField('min');
		$this->addFormField('nbCouverts');
	 }

	public function book()
	{
		$db = new Database();
		$hour = sprintf("%02d:%02d:%02d", $this->getFormFields()['hour'], $this->getFormFields()['min'], 0);
		 $date = sprintf("%04d-%02d-%02d", $this->getFormFields()['year'], $this->getFormFields()['month'], $this->getFormFields()['day']);
		$db->executeSql('INSERT INTO booking (BookingDate, BookingTime, NumberOfSeats, User_Id, CreationTimestamp) VALUES(?, ? ,? ,? ,NOW())',array($date, $hour, $this->getFormFields()['nbCouverts'], $_SESSION['Id']));
	}
	
}