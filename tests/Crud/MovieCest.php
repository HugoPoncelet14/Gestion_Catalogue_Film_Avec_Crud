<?php
namespace Tests\Crud;
use Entity\Exception\EntityNotFoundException;
use Entity\Movie;
use Tests\CrudTester;

class MovieCest
{
    public function findById(CrudTester $I)
    {
        $movie = Movie::findById(108);
        $I->assertSame(108, $movie->getId());
        $I->assertSame('Trois couleurs : Bleu', $movie->getTitle());
    }

    public function findByIdThrowsExceptionIfArtistDoesNotExist(CrudTester $I)
    {
        $I->expectThrowable(EntityNotFoundException::class, function () {
            Movie::findById(PHP_INT_MAX);
        });
    }
}
