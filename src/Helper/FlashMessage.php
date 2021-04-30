<?php
namespace App\Helper;
trait FlashMessage
{
    private static int $successCounter = 0;
    private static string $succesMessage = '';
    private static string $prefixForErrorMessage = '';
    private static string $suffixForErrorMessage = '';
    public function mountSuccessMessage():void
    {
        static::$succesMessage = (static::$successCounter > 0)
            ? static::$successCounter.
                " files were successfully sent.<br>"
            : '';
    }
    public function definePrefixAndSuffixFromErrorMessage(
        $imageName):void
    {
        static::$prefixForErrorMessage =
            (static::$prefixForErrorMessage == '')
                ? "Error(s) sending file(s):"
                : static::$prefixForErrorMessage;
        static::$suffixForErrorMessage =
            static::$suffixForErrorMessage."<br>"
                .$imageName.";";
    }
    public function defineMessageType(
        $successCounter, $suffixForErrorMessage
    ):string
    {
        if($successCounter > 0
            && $suffixForErrorMessage == ''){
                return "alert-success";
        }elseif($successCounter > 0
        && $suffixForErrorMessage != ''){
            return "alert-warning";
        }
        return "alert-danger";
    }
    public function setFinalMessage():string
    {
        return static::$succesMessage
        .static::$prefixForErrorMessage
        .static::$suffixForErrorMessage;
    }
    public function defineMessage(
        string $type, string $mensagem
        ):void
    {
        $_SESSION['message'] = $mensagem;
        $_SESSION['messageType'] = $type;
    }
}
